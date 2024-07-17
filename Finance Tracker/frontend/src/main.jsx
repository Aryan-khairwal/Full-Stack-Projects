import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import { ClerkProvider } from '@clerk/clerk-react'
import { RouterProvider, createBrowserRouter } from 'react-router-dom'
import Auth from './pages/auth/Auth'
import Dashboard from './pages/dashboard/index'
import Header from './pages/Header'

const router = createBrowserRouter([
  {
    path: "/auth",
    element: <Auth />,
  },
  {
    path: "/",
    element: <Dashboard />,
  }
])

const PUBLISHABLE_KEY = import.meta.env.VITE_CLERK_PUBLISHABLE_KEY

if (!PUBLISHABLE_KEY) {
  throw new Error("Missing Publishable Key")
}

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <ClerkProvider publishableKey={PUBLISHABLE_KEY}>
      <Header />
      <RouterProvider router={router} />
    </ClerkProvider>
  </React.StrictMode>,
)
