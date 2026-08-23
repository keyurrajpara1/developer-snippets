import React, { useEffect, useState } from "react";

const UseEffectHook = () => {
  const [counter, setCounter] = useState(0);
  useEffect(() => {
    console.log("useEffect is running");
    document.title = `Counter value = ${counter}`;
  }, [counter]);
  return (
    <>
        UseEffectHook
        <br />
        <h1>{counter}</h1>
        <button onClick={() => setCounter(counter+1)}>Increase counter</button>
        <button onClick={() => setCounter(counter-1)}>Decrease counter</button>
    </>
  );
};

export default UseEffectHook;
