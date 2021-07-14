let lessons = []
const lessonsSelecter = document.querySelector(".lessons-selecter")
axios.get("https://firestore.googleapis.com/v1/projects/ingrwf09/databases/(default)/documents/cours")

.then(response => {
  lessons = response.data.documents
  console.log(lessons)
    lessons.forEach(item => {
      console.log(item)
      let templete = `<option>${item.fields.label.stringValue}</option>`
      lessonsSelecter.innerHTML += templete
      
    
    console.log(lessonsSelecter)
  })
})
.catch (error => console.log(error))

