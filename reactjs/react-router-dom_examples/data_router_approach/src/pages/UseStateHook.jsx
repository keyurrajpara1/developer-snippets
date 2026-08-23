import React from "react";
import { useState } from "react";
const UseStateHook = () => {
  const [counter, setCounter] = useState(0);
  const increase = () => {
    setCounter(counter+1);
  }
  const decrease = () => {
    setCounter(counter-1);
  }
  return (
    <>
        UseStateHook
        <br />
        <h1>{counter}</h1>
        <button onClick={increase}>Increase by +1</button>{" "}
        <button onClick={decrease}>Decrease by -1</button>
    </>
  );
};

export default UseStateHook;
