import React, { useEffect, useState } from 'react'


function RecordTable() {

  const [financialRecords, setFinancialRecords] = useState([])




  const getRecords = async () => {
    const result = await fetch('http://localhost:3001/')
    const records = await result.json()
    setFinancialRecords(records)
  }

  useEffect(() => { getRecords() }, [])


  console.log(financialRecords);
  return (
    <div className="table-container w-full " >
      <table className='border border-white w-full'>
        <thead className='bg-sky-600 text-white h-7 '>
          <th>Description</th>
          <th>Amount</th>
          <th>Category</th>
          <th>Payment Method</th>
          <th>Action</th>
        </thead>
        <tbody >

          {financialRecords.map((record, index) =>
            <tr key={index} className='even:bg-white  text-center'>
              <td>{record.description} </td>
              <td>{record.amount} </td>
              <td>{record.category} </td>
              <td>{record.paymentMethod} </td>
              <td><button>Edit</button> <button>Delete</button> </td>
            </tr>)}

        </tbody>
      </table>
    </div>
  )
}

export default RecordTable