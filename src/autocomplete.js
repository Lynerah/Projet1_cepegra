let keywords = document.querySelector(".keywords")
let serp = document.querySelector(".serp")
const urlApiPersonnel2 = "https://firestore.googleapis.com/v1/projects/ingrwf09/databases/(default)/documents/personnel"
let results = []

// alert("hello");
//autocomplete
if(keywords) {
    console.log(keywords)
keywords.addEventListener("keyup", (e) => {
    e.preventDefault
    console.log("target"+ e.target.value)
    if(e.target.value.length > 1) {
    //console.log("this"+this.value)
    //console.log("keywords"+keywords.value)
    axios.get(urlApiPersonnel2)

    .then(response => {
        results = response.data.documents
    })
    .catch (error => console.log(error))

    keywords.addEventListener("keyup", (e) =>{
        serp.innerHTML = ''
        e.preventDefault
        let keyword = e.target.value
        if(keyword.length > 2){
            results.forEach(item => {
                if ((item.fields.prenom.stringValue.toLowerCase().search(keyword.toLowerCase()) >= 0) || (item.fields.nom.stringValue.toLowerCase().search(keyword.toLowerCase()) >= 0))
                serp.innerHTML += `
                  <li class="serp-item" data-id="${item.name}">
                    ${item.fields.prenom.stringValue} ${item.fields.nom.stringValue}
                  </li>
                `
            })
        }
    })

    serp.addEventListener("click", (e) => {
        e.preventDefault
        console.log(e.target)
        if(e.target.classList.contains("serp-item")) {
          keywords.value = e.target.innerText
          document.querySelector(".userKey").value=e.target.dataset.id
          
        }
      }) 
       
    }
})
}
