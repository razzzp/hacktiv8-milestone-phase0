
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
}

class ExerciseWorkout{
   constructor(exercise){
      this.exercise = exercise;
      this.sets= [new Set()];
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
   setCard.classList.add("set-card", "row","margin-auto")
   return setCard;
}


function buildExerciseWorkoutCard(){
   const exWorkCard = buildDivWithClasses("exwork-card", "container", "p-4");
   return exWorkCard;
}


function renderSet(set, setNum, underElem){
   const setCard = buildSetCard();

   const setNumCol = setCard.appendChild(buildDivWithClasses("col-4"));
   setNumCol.innerHTML = setNum
   
   const weightCol = setCard.appendChild(buildDivWithClasses("col-4"));
   weightCol.innerHTML = set.weight

   const repsCol = setCard.appendChild(buildDivWithClasses("col-4"));
   repsCol.innerHTML = set.reps

   underElem.append(setCard);
}

function renderSetTableHeader(underElem){
   const row = underElem.appendChild(buildDivWithClasses("row","margin-auto"));
   const col1= row.appendChild(buildDivWithClasses("col-4"));
   col1.innerHTML = "Set Num";

   const col2 = row.appendChild(buildDivWithClasses("col-4"));
   col2.innerHTML = "Weight(kg)";

   const col3 = row.appendChild(buildDivWithClasses("col-4"));
   col3.innerHTML = "Reps";
}

function renderExerciseWorkout(exerciseWorkout, underElem){
   const exWorkCard = buildExerciseWorkoutCard();

   const exercise = exWorkCard.appendChild(document.createElement("h2"));
   exercise.textContent =exerciseWorkout.exercise.name
   // console.log(exerciseWorkout)

   const setContainer = exWorkCard.appendChild(buildDivWithClasses(["containter"]));
   renderSetTableHeader(setContainer)
   exerciseWorkout.sets.forEach((set, idx)=>{
      renderSet(set, idx, setContainer);
   })
   underElem.append(exWorkCard);
}

function render(){
   console.log("rendering..");
   const renderArea= document.getElementById("app-root");
   if (!renderArea){
      console.log("cannot find root node");
      return
   }
   exerciseWorkouts.forEach((val, idx)=>{
      renderExerciseWorkout(val, renderArea);
   });
}

render();