import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import Index from './components/pages/Index'

import './assets/App.css'

function App() {
  const [count, setCount] = useState(0)

  return (
    <>
     <Index/>
     
    </>
  )
}

export default App
