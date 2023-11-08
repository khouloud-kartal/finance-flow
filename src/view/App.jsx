// import { useState } from 'react'
// import reactLogo from './assets/react.svg'
// import viteLogo from '/vite.svg'
// import './assets/App.css'
import Header from "./components/Header"
import TopBar from "./components/TopBar"
import Balance from "./components/Balance"

function App() {
  // const [count, setCount] = useState(0)

  return (
    <>
      <Header />
        <main>
          <section>
            <TopBar />
            <aside>
              <Balance />
            </aside>
          </section>
        </main>
    </>
  )
}

export default App
