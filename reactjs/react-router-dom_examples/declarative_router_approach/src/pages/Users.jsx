import React from 'react'
import { Link } from 'react-router-dom';
const Users = () => {
    const users = [
        { id: 1, name: 'Superman', gmail: 'superman@gmail.com', age: 20 },
        { id: 2, name: 'Spiderman', gmail: 'spiderman@gmail.com', age: 21 },
        { id: 3, name: 'Batman', gmail: 'batman@gmail.com', age: 22 },
        { id: 4, name: 'Ironman', gmail: 'ironman@gmail.com', age: 22 }
    ];

  return (
    <>
        {users.map((data) => (
            <div key={data.id}>
                <Link to={`/user/${data.id}`}><h3>{data.name}</h3></Link>
            </div>
        ))}
    </>
  )
}

export default Users