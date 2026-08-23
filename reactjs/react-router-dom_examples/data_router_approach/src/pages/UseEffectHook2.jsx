import React, { useEffect, useState } from "react";

const UseEffectHook2 = () => {
  const [name, setName] = useState('');
  const [jsonData, setJsonData] = useState([]);
  useEffect(() => {
    if (!name) return;
    /* 
    https://jsonplaceholder.typicode.com/albums
    https://jsonplaceholder.typicode.com/todos */
    const fetchData = async () => {
      try {
        const res = await fetch(`https://jsonplaceholder.typicode.com/${name}`);
        const jsonData = await res.json();

        console.log(jsonData);
        setJsonData(jsonData);
      } catch (error) {
        console.error("Error fetching data:", error);
      }
    };
    fetchData();
  }, [name]);
  return (
    <>
        UseEffectHook2
        <br />
        <br />
        <button onClick={() => setName('posts')}>Posts</button>
        <button onClick={() => setName('albums')}>Albums</button>
        <button onClick={() => setName('todos')}>Todos</button>
        <br />
        {
          jsonData.map((item)=>{
            return (
              <h4 key={item.id}>
                {item.id} {item.title}
              </h4>
            )
          })
        }
    </>
  );
};

export default UseEffectHook2;
