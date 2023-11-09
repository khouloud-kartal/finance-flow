import { useState } from 'react'
import Index from './components/pages';
import Profile from './components/pages';
import Header from './components/Header';

let index = <Index />
let profile = <Profile />

function App() {
  const [page, setPage] = useState(index);
   setPage(index)
  return (
    <>
      <Header />
      {page}
      {/* <Profile /> */}
    </>
  );
}

export default App
