import { useState, useEffect } from "react";
import axios from "axios";

const App = () => {

  const [liste, setListe] = useState([{ nom: "test", prix: 12}])

  useEffect(() => {
    console.log("le composant est chargé")
    // axios
    //   .get("https://127.0.0.1:8000/api/produits", 
    //     { 
    //       headers: { 
    //         Accept: "application/json"
    //       }
    //     }
    //   )
    //   .then((response) => {
    //     console.log(response.data)
    //     setListe(response.data)
    //   })
    fetch("https://127.0.0.1:8000/api/produits", {
      headers: {
        'Accept': 'application/json'
      }
    })
    .then( (response) => { return response.json() } )
    .then( (data) => { 
      console.log(data) 
      setListe(data)
    })
  }, [])

  useEffect(() => {
    console.log("liste est modifiée")
    
  }, [liste])

  return (
    <div>
      App4
      <hr />
      { liste.map( (elt, index) => (
          <div key={index}>
              {elt.prix} {elt.nom}
          </div>        
      ) )}
    </div>
  );
}

export default App;
