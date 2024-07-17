import RecordForm from "./RecordForm";
import RecordTable from "./RecordTable";
import { FinanceTrackerContext } from '../../contexts/FinanceTrackerContext'


import React, { useState } from 'react'

function Dashboard() {
  const addRecord = () => {
    console.log('record added!');
  }

  const [records, setRecords] = useState();
  return (
    <div className="bg-gray-200 flex justify-center min-h-full">
      <div className="w-2/3">
        <h1 className="font-bold text-2xl text-center">welcome to your Personal Finance Tracker! </h1>
        <FinanceTrackerContext.Provider value={{ records, addRecord }}>
          <RecordForm />
          <RecordTable />
        </FinanceTrackerContext.Provider>
      </div>
    </div >
  )
}

export default Dashboard