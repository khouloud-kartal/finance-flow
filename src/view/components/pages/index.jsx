import Header from "../Header"
import TopBar from "../TopBar"
import Balance from "../Balance"
import CategoriesDisplay from "../CategoriesDisplay"
import AddTransaction from "../AddTrasaction"
import FourLastestTransaction from "../FourLastestTransaction"


function Index() {
    return (
        <>
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

export default Index;