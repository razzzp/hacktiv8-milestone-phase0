
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
      4,
   ),
   new Exercise(
      "Squat",
      "assets/img/bg-1",
      8,
   ),
   new Exercise(
      "Deadlift",
      "assets/img/bg-1",
      6,
   ),
   new Exercise(
      "Lateral raise",
      "assets/img/bg-1",
      2,
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
   const exWorkCard = buildDivWithClasses("exwork-card", "container", "p-4" , "my-4");
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
   const exWorkCard = underElem.appendChild(buildExerciseWorkoutCard());

   // exercise details
   const exercise = exWorkCard.appendChild(document.createElement("h2"));
   exercise.classList.add("exwork-head")
   exercise.textContent =exerciseWorkout.exercise.name
   // console.log(exerciseWorkout)

   // sets table
   const setContainer = exWorkCard.appendChild(buildDivWithClasses("containter", "sets-table","my-3"));
   renderSetTableHeader(setContainer)
   exerciseWorkout.sets.forEach((set, idx)=>{
      renderSet(set, idx, eWNum, setContainer);
   })

   // add set button
   const addSetButton = exWorkCard.appendChild(document.createElement("button"));
   addSetButton.textContent = "Add Set";
   addSetButton.classList.add("btn", "btn-secondary");
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

function renderSelectExercise(){
   // get container to render
   const renderArea= document.getElementById("select-exercise-container");
   if (!renderArea){
      console.log("cannot find root node");
      return
   }
   // render
   // <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
   //             <option selected>Select exercise</option>
   //             <option value="1">One</option>
   //             <option value="2">Two</option>
   //             <option value="3">Three</option>
   //          </select>
   const select = renderArea.appendChild(document.createElement("select"))
   select.classList.add("form-select", "form-select-lg", "mb-3")
   // so it can referenced later
   select.id = "select-exercise";
   // append first option
   const firstOption = select.appendChild(document.createElement("option"));
   firstOption.innerHTML = "Select exercise"
   // append options based on predefined exercises
   predefinedExercises.forEach((cur, idx)=>{
      const option = select.appendChild(document.createElement("option"));
      option.innerHTML = cur.name;
      // set value to idx so it can be used later
      option.value = idx
   })
}


function addExercise(){
   const selectInput= document.getElementById("select-exercise");
   if (!selectInput){
      console.log("cannot find select exercise input");
      return
   }

   const selectedExerciseIdx = Number.parseInt(selectInput.value)
   console.log(`selected ex idx: ${selectedExerciseIdx}`);
   // check value and within range
   if(selectedExerciseIdx >-1 && selectedExerciseIdx<predefinedExercises.length){
      // add exercise at input
      const exercise = predefinedExercises[selectedExerciseIdx];
      console.log(`Adding ex workout: ${exercise.name}`);
      exerciseWorkouts.push(new ExerciseWorkout(
         exercise
      ));
   }
   render()
}

function calculateWorkoutSummary(){
   const totalSets = exerciseWorkouts.reduce((prev, cur)=>{
      return prev + cur.sets.length;
   },0);
   // volume is weight * reps
   //  gets volume for each exWorkout
   const exWorkoutVolumes = exerciseWorkouts.map((cur)=>{
      return cur.sets.reduce((prev, cur)=>{
         return prev + cur.weight * cur.reps;
      },0);
   })

   // assume 1 set takes 2 minutes, with 3 minute rest time
   const estimatedWorkoutTimeMinutes = totalSets * 2 + totalSets * 3;
   // from google
   const caloriesBurnedPerHour = 360

   const totalCalories = (360/60) * estimatedWorkoutTimeMinutes;

   return {
      totalSets: totalSets,
      totalVolume: exWorkoutVolumes.reduce((prev,cur)=>{return prev+cur},0),
      estimatedWorkoutTimeMinutes: estimatedWorkoutTimeMinutes,
      totalCalories: totalCalories
   };
}

// append 1 row in summry field
function appendSummaryField(label, value, underCard){
   const row = underCard.appendChild(
      buildDivWithClasses(
         "d-flex", "flex-row", "justify-content-between", "summary-field",
         "my-2"
      )
   );
   const labelDiv = row.appendChild(buildDivWithClasses());
   labelDiv.innerHTML = label;
   const valueDiv = row.appendChild(buildDivWithClasses());
   valueDiv.innerHTML = value;
}


// for appending h2
function appendSummaryH2(value, underCard){
   const row = underCard.appendChild(
      buildDivWithClasses(
         "d-flex", "flex-row", "justify-content-center",
         "my-2"
      )
   );
   const valueDiv = row.appendChild(document.createElement("h2"));
   valueDiv.textContent = value;
}

function finishWorkout(){
   // get container to show workout summary
   const renderArea = document.getElementById("finish-workout-container");
   if(!renderArea) {
      console.log("Error on finsih workout, cannot find render container");
      return;
   }
   // remove button
   renderArea.innerHTML = "";
   // disable add exercise button
   const addExerciseBtn = document.getElementById("add-exercise");
   addExerciseBtn.classList.add("disabled")
   //
   const workoutSummary = calculateWorkoutSummary()
   console.log(workoutSummary)
   // render summary table
   const summaryCard = renderArea.appendChild(
      buildDivWithClasses(
         "summary-card",
         "d-flex", 
         "flex-column",
         "p-3",
         "my-5"
      )
   );
   // header
   const summaryHeader = summaryCard.appendChild(document.createElement("h2"));
   summaryHeader.textContent = "Keep up the good work!"
   // summary fields
   appendSummaryField("Total Sets", workoutSummary.totalSets, summaryCard);
   appendSummaryField("Total Volume", `${workoutSummary.totalVolume} kgs`, summaryCard);
   const totalMins = workoutSummary.estimatedWorkoutTimeMinutes;
   const hours = Math.floor(totalMins / 60);
   const min = totalMins %60
   appendSummaryField("Estimated Workout Time", `${hours} hour(s) ${min} minute(s)`, summaryCard);

   appendSummaryH2(`You burned ${workoutSummary.totalCalories} calories!`, summaryCard);
}

// renders data into root div
function render(){
   console.log("rendering..");
   const renderArea= document.getElementById("workout-container");
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

// add button events
// add exercise button
const addExerciseBtn = document.getElementById("add-exercise");
addExerciseBtn.addEventListener("click", (e)=>{addExercise()})
// finish workout buttone
const finsihExerciseBtn = document.getElementById("finish-workout-btn");
finsihExerciseBtn.addEventListener("click", (e)=>{finishWorkout()})
// render
renderSelectExercise()
render();