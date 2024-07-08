import React from 'react'
import Logo from './Logo'

function Navbar() {
  return (
    <nav className='w-full'>
      <div className=" px-4 hidden bg-slate-800 sm:flex h-10 justify-between items-center text-white ">

        <Logo />

        <div className=' space-x-4 text-sm'><a className="navLink" href="/">Home</a><a className="navLink" href="#">About</a><a className="navLink" href="#">Contact</a></div>
      </div>

      <div className=" sm:bg-inherit  bg-slate-800 h-20 sm:text-inherit text-3xl text-center pt-2">
        <Logo />
        <p className='text-white text-sm italic'>Your own Password Manager</p>
      </div>
    </nav>
  )
}

export default Navbar