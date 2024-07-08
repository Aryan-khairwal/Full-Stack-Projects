import React, { useState } from 'react'

function Table({ passwordsArray, setPasswords }) {
  const [card, setCard] = useState({ username: '', password: '' })

  const deletePassword = async (id) => {

    await fetch('http://localhost:8000',
      {
        method: 'DELETE',
        headers: { "Content-Type": "application/json" },

        body: JSON.stringify({ id })

      })

    const previousPasswords = passwordsArray.filter((password) => password._id != id)
    setPasswords(previousPasswords)

    closeCard()
  }

  const displayCard = (password) => {
    setCard(password)
    const card = document.querySelector('#passwordCard')
    card.classList.toggle('hidden')


  }

  const closeCard = () => {
    const card = document.querySelector('#passwordCard')
    card.classList.toggle('hidden')
  }

  const copyUser = () => {
    const username = document.getElementById('username')
    username.select()
    navigator.clipboard.writeText(username.value);
  }

  const copyPass = () => {
    const passwordtext = document.getElementById('password')
    passwordtext.select()
    navigator.clipboard.writeText(passwordtext.value);
  }

  const saveBtn = async (id) => {
    //deleting old password
    await fetch('http://localhost:8000',
      {
        method: 'DELETE',
        headers: { "Content-Type": "application/json" },

        body: JSON.stringify({ id })

      })
    //updating in state 
    const previousPasswords = passwordsArray.filter((password) => password._id != id)
    const updatedPassword = { ...card }

    setPasswords([updatedPassword, ...previousPasswords])

    const newPassword = { site: updatedPassword.site, username: updatedPassword.username, password: updatedPassword.password }
    //saving new updated password in db
    await fetch('http://localhost:8000',
      {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(newPassword)
      })

    const username = document.getElementById('username')
    username.readOnly = true;
    const password = document.getElementById('password')
    password.readOnly = true;

    document.getElementById('saveBtn').classList.toggle('hidden')
  }
  const editBtn = () => {
    const username = document.getElementById('username')
    const password = document.getElementById('password')
    username.readOnly = false;
    password.readOnly = false;

    document.getElementById('saveBtn').classList.toggle('hidden')

  }


  return (
    <>
      <h3 className='text-left mt-5 font-bold text-lg'>Your Saved Passwords</h3>

      {passwordsArray.length === 0 &&
        <div className="sm:w-4/5   w-full shadow-md sm:rounded-lg p-2 rounded-lg text-center text-sm"> No Passwords to Display</div>}

      {passwordsArray.length > 0 &&
        <div className="sm:w-4/5   w-full shadow-md sm:rounded-lg p-2 rounded-lg">
          <table className="rounded-lg overflow-hidden w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead className=" text-white  uppercase bg-gray-800 dark:bg-slate-900 dark:text-gray-200">
              <tr>
                <th scope="col" className="px-4 py-3">
                  Sites and Apps
                </th>
                <th ></th>
              </tr>
            </thead>
            <tbody>


              {
                passwordsArray.map((password, index) => <tr key={index} className="odd:bg-white odd:hover:bg-slate-100 odd:hover:dark:bg-slate-600 odd:dark:bg-slate-700 even:hover:bg-gray-300 even:bg-gray-400 even:dark:bg-slate-800 even:hover:dark:bg-slate-600 ">

                  <th
                    onClick={() => displayCard(password)}
                    className="px-4 py-4 font-medium text-gray-900 text-wrap  dark:text-white w-full box-border">
                    {password.site}
                  </th>
                  <th
                    onClick={() => displayCard(password)}
                    className='px-4  text-right font-bold text-lg'>&gt;</th>
                </tr>)
              }
            </tbody>
          </table>
        </div>

      }

      {/* {Password Detail Card} */}
      <div id='passwordCard' className='hidden mx-9 min-h-48 bg-slate-400  w-11/12 rounded-lg shadow-lg shadow-black absolute top-1/2 p-2 sm:py-4 '>
        <h4 className='sm:mb-4'>🌐 {card.site}</h4>

        <label htmlFor="username" className='text-sm px-2  text-slate-900'>Username</label>
        <input type='text' onChange={(e) => setCard({ ...card, username: e.target.value })} value={card.username} readOnly={true} className='w-10/12 rounded-full h-8 border px-4 font-mono mb-4' name='username' id='username' /> <span onClick={copyUser}>copy</span>
        <br />
        <label htmlFor="password" className='text-sm px-2 text-slate-900'>Password</label>
        <input type='text' onChange={(e) => setCard({ ...card, password: e.target.value })} value={card.password} readOnly={true} className='w-10/12 rounded-full h-8 border px-4 font-mono mb-3' name='password' id='password' /> <span onClick={copyPass}>copy</span>


        <button
          onClick={() => deletePassword(card._id)}
          className='cardBtn'>Delete</button>
        <button
          onClick={editBtn} className='cardBtn'>Edit</button>
        <button
          onClick={() => saveBtn(card._id)} className='cardBtn hidden' id='saveBtn'>Save</button>

        <button onClick={closeCard} className='absolute right-4  text-lg top-2 font-bold'>x</button>

      </div >


    </>
  )
}

export default Table