
// class definitions
class Exercise{
   constructor(name, imgUrl, caloriesPerKgRep){
      this.name = name;
      this.imgUrl = imgUrl;
      this.caloriesPerKgRep = caloriesPerKgRep;
   }
}

class Set{
   constructor(weight = 10, reps = 10){
      this.weight = weight;
      this.reps = reps;
   }

   clone(){
      return new Set(this.weight, this.reps)
   }
}

class ExerciseWorkout{
   constructor(exercise){
      this.exercise = exercise;
      this.sets= [new Set(10,10)];
   }
}


// arrays
const predefinedExercises = [
   new Exercise(
      "Bench press",
      "assets/img/bg-1",
      1,
   ),
]
const exerciseWorkouts =[
   new ExerciseWorkout(predefinedExercises[0])
]

// utility function to create div with classes
function buildDivWithClasses(...classes){
   const div = document.createElement("div");
   if (Array.isArray(classes)){
      classes.forEach(cur => {
         div.classList.add(cur);
      })
   }
   
   return div;
}

function buildSetCard(){
   const setCard = document.createElement("div");
   setCard.classList.add("set-card", "row", "my-2","p-1")
   return setCard;
}


function buildExerciseWorkoutCard(){
   const exWorkCard = buildDivWithClasses("exwork-card", "container", "p-4");
   return exWorkCard;
}


function renderSet(set, setNum, eWNum, underElem){
   const setCard = buildSetCard();

   const setNumCol = setCard.appendChild(buildDivWithClasses("col-2"));
   setNumCol.innerHTML = setNum +1
   
   const weightCol = setCard.appendChild(buildDivWithClasses("col-5"));
   // build form for weight
   const weightForm = weightCol.appendChild(document.createElement("input"));
   weightForm.type = "number";
   weightForm.value = set.weight;
   weightForm.classList.add("w-75")
   // handler to update list when fields changed
   weightForm.onchange = (event) => {
      const newVal = Number.parseInt(event.target.value);
      // update corresponding weight in set in exercise workout
      exerciseWorkouts[eWNum].sets[setNum].weight = newVal;
      render()
   }

   const repsCol = setCard.appendChild(buildDivWithClasses("col-5"));
   // build form for reps
   const repsForm = repsCol.appendChild(document.createElement("input"));
   repsForm.type = "number";
   repsForm.value = set.reps;
   repsForm.classList.add("w-75")
   // handler to update list when fields changed
   repsForm.onchange = (event) => {
      const newVal = Number.parseInt(event.target.value);
      // update corresponding weight in set in exercise workout
      exerciseWorkouts[eWNum].sets[setNum].reps = newVal;
      render()
   }

   underElem.append(setCard);
}

function renderSetTableHeader(underElem){
   // headers of set table
   const row = underElem.appendChild(buildDivWithClasses("row","margin-auto"));
   const col1= row.appendChild(buildDivWithClasses("col-2"));
   col1.innerHTML = "Set";

   const col2 = row.appendChild(buildDivWithClasses("col-5"));
   col2.innerHTML = "Weight(kg)";

   const col3 = row.appendChild(buildDivWithClasses("col-5"));
   col3.innerHTML = "Reps";
}

function renderExerciseWorkout(exerciseWorkout, eWNum,  underElem){
   const exWorkCard = buildExerciseWorkoutCard();

   // exercise details
   const exercise = exWorkCard.appendChild(document.createElement("h2"));
   exercise.textContent =exerciseWorkout.exercise.name
   // console.log(exerciseWorkout)

   // sets table
   const setContainer = exWorkCard.appendChild(buildDivWithClasses("containter", "sets-table","my-3"));
   renderSetTableHeader(setContainer)
   exerciseWorkout.sets.forEach((set, idx)=>{
      renderSet(set, idx, eWNum, setContainer);
   })
   underElem.append(exWorkCard);

   // add set button
   const addSetButton = exWorkCard.appendChild(document.createElement("button"));
   addSetButton.textContent = "Add Set";
   addSetButton.classList.add("btn", "btn-primary");
   addSetButton.onclick = () => {
      let lastSet = exerciseWorkout.sets[exerciseWorkout.sets.length -1];
      if (!lastSet){
         lastSet = new Set(10,10)
      }
      // adds new set
      exerciseWorkout.sets.push(lastSet.clone());
      render()
   }
}

// renders data into root div
function render(){
   console.log("rendering..");
   const renderArea= document.getElementById("app-root");
   if (!renderArea){
      console.log("cannot find root node");
      return
   }
   // clear first
   renderArea.innerHTML="";

   // lets build our own react :)
   exerciseWorkouts.forEach((val, idx)=>{
      renderExerciseWorkout(val, idx, renderArea);
   });
}

render();