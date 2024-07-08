import { useState } from 'react'
import Manager from './components/Manager'
import Navbar from './components/Navbar'

function App() {

  return (
    <div className='bg-slate-500 min-h-screen flex flex-col items-center ' >
      <Navbar />
      <Manager />

    </div>

  )
}

export default App
