const steps = document.querySelectorAll('.stepper__row');
const stepsArray = Array.from(steps);



function clickHandler(target) {
  const currentStep = document.querySelector('.stepper__row--active');
  stateHandler(currentStep);
}

function stateHandler(step) {
  let nextStep;
  let currentStepIndex = stepsArray.indexOf(step);
  if (currentStepIndex < stepsArray.length - 1) {
    nextStep = stepsArray[currentStepIndex + 1];
    classHandler([nextStep, step])
  }
}

function classHandler(steps) {
  steps.forEach(step => {
    step.classList.toggle('stepper__row--disabled');
    step.classList.toggle('stepper__row--active');
  });
}