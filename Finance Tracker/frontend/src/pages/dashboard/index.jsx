import RecordForm from "./RecordForm";
import RecordTable from "./RecordTable";
import { useEffect } from "react";
import { FinanceTrackerContext } from '../../contexts/FinanceTrackerContext'


import React, { useState } from 'react'

function Dashboard() {

  const [records, setRecords] = useState([])

  const addRecord = async (record) => {
    try {
      await fetch('http://localhost:3001/', {
        method: 'POST',
        headers: { 'content-type': 'application/json' },
        body: JSON.stringify(record)
      })
    } catch (error) {
      console.log(error);
    }

  }

  const updateRecord = (id, record) => {

  }

  const deleteRecord = async (id) => {
    const res = await fetch('http://localhost:3001',
      {
        method: 'DELETE',
        body: JSON.stringify({ _id: id }),
        headers: { 'content-type': 'application/json' }
      })

    setRecords(records.filter(record => record._id !== id))
  }

  const getRecords = async () => {
    const result = await fetch('http://localhost:3001/')
    const records = await result.json()
    setRecords(records)
  }

  useEffect(() => { getRecords() }, [])


  return (
    <div className="bg-gray-200 flex justify-center min-h-screen">
      <div className="w-2/3">
        <h1 className="font-bold text-2xl text-center">welcome to your Personal Finance Tracker! </h1>
        <FinanceTrackerContext.Provider value={{ records, addRecord, getRecords, updateRecord, deleteRecord }}>
          <RecordForm />
          <RecordTable />
        </FinanceTrackerContext.Provider>
      </div>
    </div >
  )
}

export default Dashboard