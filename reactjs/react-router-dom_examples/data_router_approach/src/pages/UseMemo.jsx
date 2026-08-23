import React, { useEffect, useReducer, useState, useMemo } from "react";
const UseMemo = () => {
  const [count, setCount] = useState(0);
  const [num, setNum] = useState(10);

  // complex or expensive function runs on every render
  const complexCalculation = useMemo(() => {
    // console.log("Calculating...");
    for(let i = 0; i < 1000; i++){
      console.log("Calculating...");
    }
    return num + 2;
  }, [num]); // only re run when 'num'
  const result = complexCalculation;
  return (
    <>
        <div>
            <h2>Result = {result}</h2>
            <button onClick={()=>setCount(count + 1)}>Increase</button>
            <h4>Count: {count}</h4>
            <h2>Num = {num}</h2>
            <button onClick={()=>setNum(num + 1)}>Increase Num</button>
        </div>
    </>
  );
};

export default UseMemo;
