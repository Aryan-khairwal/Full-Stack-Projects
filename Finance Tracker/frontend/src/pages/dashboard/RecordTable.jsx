import React, { useEffect, useState } from 'react'
import { useFinancialRecords } from '../../contexts/FinanceTrackerContext'

function RecordTable() {

  const { records, deleteRecord, updateRecord } = useFinancialRecords()

  return (
    <div className="table-container w-full " >
      <table className='border border-white w-full align-middle'>
        <thead className='bg-sky-600 text-white h-7 '>
          <th>Description</th>
          <th>Amount</th>
          <th>Category</th>
          <th>Payment Method</th>
          <th>Action</th>
        </thead>
        <tbody >

          {records.map((record, index) =>
            <tr key={index} className='even:bg-white  text-center'>
              <td>{record.description} </td>
              <td>{record.amount} </td>
              <td>{record.category} </td>
              <td>{record.paymentMethod} </td>
              <td ><button className='px-2 mx-2 hover:underline'>Edit</button><button className='hover:underline' onClick={() => deleteRecord(record._id)}>Delete</button> </td>
            </tr>)}

        </tbody>
      </table>
    </div>
  )
}

export default RecordTable