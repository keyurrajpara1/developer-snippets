import React, { useRef, useState } from "react";
const UseRef = () => {
  const [bg, setBg] = useState("#fff");
  const changeBg = () => {
    const colors = ["yellow", "pink", "blue", "orange", "purple", "black"];
    setBg(colors[Math.floor(Math.random() * colors.length)]);
  }
  console.log("Re - rendered components");
  return (
    <>
        <div style={{height: '100vh', backgroundColor: bg, display: "flex", justifyContent: "center", alignItems: "center"}}>
          UseRef
          <br /><br />
          <button onClick={changeBg}>Change Background</button>
        </div>
    </>
  );
};

export default UseRef;
