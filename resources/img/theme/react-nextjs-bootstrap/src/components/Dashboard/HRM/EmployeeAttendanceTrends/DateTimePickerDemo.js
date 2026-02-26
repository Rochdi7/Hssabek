"use client";

import React, { useState } from 'react';
import DateTimePicker from 'react-datetime-picker';

const DateTimePickerDemo = () => {
  const [selectedDate, setSelectedDate] = useState(new Date());

  return (
    <>
      <DateTimePicker
        onChange={setSelectedDate}
        value={selectedDate}
        format="y-MM-dd h:mm a" // Format for display (e.g., "2024-10-29 3:30 PM")
        className="date-time-picker-demo"
      />
    </>
  );
};

export default DateTimePickerDemo;
