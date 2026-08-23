import React from 'react'
import { useLocation, useParams, useNavigate } from 'react-router-dom'

const User = () => {
  const users = [
    { id: 1, name: 'Superman', gmail: 'superman@gmail.com', age: 20 },
    { id: 2, name: 'Spiderman', gmail: 'spiderman@gmail.com', age: 21 },
    { id: 3, name: 'Batman', gmail: 'batman@gmail.com', age: 22 },
    { id: 4, name: 'Ironman', gmail: 'ironman@gmail.com', age: 22 }
  ];

  const params = useParams();
  const userId = params.id;
  console.log("useParams:", params); // { id: '2' }

  const user = users.find(u => u.id === Number(userId)); // convert id to number

  const location = useLocation();

  const navigate = useNavigate();

  return (
    <div>
      {user ? (
        <>
          <h2>{user.name}</h2>
          <p>Email: {user.gmail}</p>
          <p>Age: {user.age}</p>
        </>
      ) : (
        <p>User not found</p>
      )}

      <div><button onClick={() => navigate('/')}>Go to home</button></div>
    </div>
  )
}

export default User