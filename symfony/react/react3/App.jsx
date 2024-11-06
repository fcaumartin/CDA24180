import { useState } from "react";

const App = () => {

  const [element, setElement] = useState("")
  const [liste, setListe] = useState(["11", "22", "22"])

  const handleClick = (e) => {
    console.log("clique " + element)
    // let tmp = [...liste]
    // tmp.push(element)
    // setListe(tmp)
    setListe([...liste, element])
  }

  return (
    <div>
      App3
      <hr />
      <input type="text" value={element} onChange={(e)=>{setElement(e.target.value)}}/>
      <button onClick={handleClick}>Ajouter</button>
      <hr />
      { liste.map( (elt, index) => (
          <div key={index}>
              {elt}
          </div>        
      ) )}
    </div>
  );
}

export default App;
