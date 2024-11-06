import { useState } from "react";

const App = () => {

  const [compteur, setCompteur] = useState(0)

  const handleClick = (event) => {
    console.log("clique")
    setCompteur(compteur+1)
  }

  return (
    <div>
      App2
      <hr />
      {compteur}
      <hr />
      <button onClick={handleClick}>Clique moi ! {compteur}</button>
    </div>
  );
}

export default App;
