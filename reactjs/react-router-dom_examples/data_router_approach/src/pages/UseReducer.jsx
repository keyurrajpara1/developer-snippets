import React, { useEffect, useReducer, useState } from "react";
const counterReducer = (state, action) => {
    if(action.type == "Increment"){
        return {counter: state.counter + 1};
    }
    else if(action.type == "Decrement"){
        return {counter: state.counter - 1};
    }
    else if(action.type == "IncrementBy10"){
        return {counter: state.counter + 10};
    }
    else if(action.type == "Reset"){
        return {counter: 0};
    }
};

const UseReducer = () => {
    const [state, dispatch] = useReducer(counterReducer, {
        counter: 0
    });
  return (
    <>
        <div>
            <h1>Counter: {state.counter}</h1>
            <button onClick={() => dispatch({type: "Increment"})}>Increase</button>
            <button onClick={() => dispatch({type: "Decrement"})}>Decrease</button>
            <button onClick={() => dispatch({type: "IncrementBy10"})}>Increase By 10</button>
            <button onClick={() => dispatch({type: "Reset"})}>Reset</button>
        </div>
    </>
  );
};

export default UseReducer;
