class Ship {
  constructor(motors, people) {
    if(this.constructor === Ship) {
      throw new Error('Cannot Use Abstract Class');
    }
    this.motors = motors;
    this.people = people;
  }
  
  totalMotor() {
    throw new Error('Not Implement totalMotor Function')
  }

  totalPeople() {
    throw new Error('Not Implement totalPeople Function');
  }
}

class MotorBoots extends Ship {
  constructor(motors, people, totalSpeed) {
    super(motors, people);
    this.totalSpeed = totalSpeed;
  }
  totalMotor() {
    return this.motors;
  }

  maxSpeeds() {
    return this.totalSpeed;
  }
}
const main = () => {
  try {
    // Uncomment for check abstract Class constructor
    // const ship = new Ship(1, 10);

    const motorBoots = new MotorBoots(4, 4, 1000);
    //Uncomment for check unimplemented method abstract class
    //console.log(motorBoots.maxSpeeds(), motorBoots.totalMotor(), motorBoots.totalPeople())

    console.log(motorBoots.totalMotor(), motorBoots.maxSpeeds())

  } catch (error) {
    console.log(error);
  }
}
main();