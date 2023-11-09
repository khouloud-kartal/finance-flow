// import { useState } from 'react'
// import reactLogo from './assets/react.svg'
// import viteLogo from '/vite.svg'
// import './assets/App.css'
import Header from "./components/Header"
import TopBar from "./components/TopBar"
import Balance from "./components/Balance"
import CategoriesDisplay from "./components/CategoriesDisplay"
import AddTransaction from "./components/AddTrasaction"
import FourLastestTransaction from "./components/FourLastestTransaction"

function App() {
  // const [count, setCount] = useState(0)

  return (
    <>
      <Header />
        <main>
          <section>            
              <TopBar />
              <div>
                <div className="container-transaction">
                  <AddTransaction />
                  <FourLastestTransaction />
                </div>

                <aside>
                  <div>
                    <Balance />
                  </div>
                  <div>
                    <CategoriesDisplay />
                  </div>
                </aside>
              </div>
          </section>
        </main>
    </>
  )
}

export default App
