import RecordForm from "./RecordForm";
import RecordTable from "./RecordTable";

import React from 'react'

function Dashboard() {
  return (
    <div className="bg-gray-200 flex justify-center min-h-full">
      <div className="w-2/3">
        <h1 className="font-bold text-2xl text-center">welcome to your Personal Finance Tracker! </h1>
        <RecordForm />
        <RecordTable />
      </div>
    </div >
  )
}

export default Dashboard