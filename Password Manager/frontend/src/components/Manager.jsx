import React, { useEffect, useRef, useState } from 'react'
import { show, invisible, edit, save } from '../assets'
import Table from './Table'

function Manager() {

  const passwordRef = useRef()
  const imgRef = useRef()

  const [password, setPassword] = useState({ site: '', username: '', password: '' })
  const [passwordsArray, setPasswordsArray] = useState([])

  async function getPasswords() {
    const result = await fetch("http://localhost:8000/")
    const passwords = await result.json()
    setPasswordsArray(passwords);

  }
  useEffect(() => {
    getPasswords()
  }, [])


  const handleShowPassword = () => {

    if (passwordRef.current.type === "password") {
      passwordRef.current.type = "text"
      imgRef.current.src = invisible
    }
    else {
      passwordRef.current.type = "password"
      imgRef.current.src = show
    }
  }

  const handleChange = (e) => {
    setPassword({ ...password, [e.target.name]: e.target.value })
  }

  const savePassword = async () => {

    // setPasswordsArray([password, ...passwordsArray])
    // localStorage.setItem('passwords', JSON.stringify([password, ...passwordsArray]))

    await fetch('http://localhost:8000',
      {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(password)
      })

    setPassword({ site: '', username: '', password: '' })
    getPasswords()

  }

  return (
    <>
      <div className='w-4/5 mt-24 sm:w-3/4 sm:mt-7 mx-auto flex flex-col gap-4 '>
        <input value={password.site} onChange={(e) => handleChange(e)} name='site' className="w-full h-11 sm:h-8 mx-auto rounded-full text-center" type="text" placeholder="Enter site name" />

        <div className='flex  sm:justify-between sm:gap-2 flex-col sm:flex-row gap-4 '>
          <input value={password.username} onChange={(e) => handleChange(e)} name='username' className="sm:w-1/2 h-11  sm:h-8 rounded-full text-center" type="text" placeholder="Enter username" />
          <input value={password.password} onChange={(e) => handleChange(e)} name='password' ref={passwordRef} className="sm:w-1/2 h-11 sm:h-8 rounded-full text-center" type="password" placeholder="Enter password" />

          <div className="relative ">
            <span className=''><img onClick={handleShowPassword} src={show} ref={imgRef} className="h-7 sm:h-6 sm:relative sm:top-1 sm:right-10 absolute bottom-6 right-[10px] " /> </span>
          </div>

        </div>

        <button onClick={savePassword} className='bg-yellow-300 rounded-full font-bold w-1/3 h-11 mt-4 sm:h-8 self-center hover:border-black hover:border-2' type="submit">save </button>

      </div>

      <Table passwordsArray={passwordsArray}
        setPasswords={setPasswordsArray} />

    </>
  )
}

export default Manager