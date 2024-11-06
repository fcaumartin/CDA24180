import { useState } from "react";

const App = () => {

  const [nom, setNom] = useState("au début")
  const [prenom, setPrenom] = useState("au début")

  const handleChangeNom = (event) => {
    setNom(event.target.value)
  }

  return (
    <div>
      <h1 className="rouge">Titre2</h1>
      App1
      <hr />
      Bonjour {prenom} {nom}
      <hr />
      <input type="text" value={nom} onChange={handleChangeNom}/>
      <input type="text" value={prenom} onChange={(event) => { setPrenom(event.target.value) }}/>
    </div>
  );
}

export default App;
