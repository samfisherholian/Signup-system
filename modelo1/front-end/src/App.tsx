import { useState } from 'react'
import { createBrowserRouter } from 'react-router'
import Welcome from './pages/welcome'
import Login from './pages/login'
import Signup from './pages/signup'

const router = createBrowserRouter([
  {
    path: "/",
    element: <Welcome />
  },
  {
    path: "/login",
    element: <Login />
  },
  {
    path: "/signup",
    element: <Signup />
  }
])

export default router
