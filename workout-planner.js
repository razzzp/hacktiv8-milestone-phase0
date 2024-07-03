



class Exercise{
   constructor(name, imgUrl, caloriesPerKgRep){
      this.name = name;
      this.imgUrl = imgUrl;
      this.caloriesPerKgRep = caloriesPerKgRep;
   }
}

class Set{
   constructor(weight = 0, reps = 0){
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

function renderExerciseWorkout(exerciseWorkout, underElem){
   let exWorkCard = document.createElement("div");
   exWorkCard.innerHTML = exerciseWorkout.exercise.name;
   underElem.append(exWorkCard);
}

function render(){
   console.log("rendering..");
   const renderArea= document.getElementById("app-root");
   if (!renderArea){
      console.log("cannot find root node");
      return
   }
   for(let exWorkout of exerciseWorkouts){   
      renderExerciseWorkout(exWorkout, renderArea);
   }
}

render();