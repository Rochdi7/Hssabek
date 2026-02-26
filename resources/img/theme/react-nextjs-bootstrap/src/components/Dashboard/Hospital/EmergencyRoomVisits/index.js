"use client";

import React, { useEffect, useState } from "react";
import { Card, Form } from "react-bootstrap";

const EmergencyRoomVisits = () => {
  const [Chart, setChart] = useState(null);

  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  // Utility function to generate random data
  const generateData = (count, range) => {
    let data = [];
    for (let i = 0; i < count; i++) {
      data.push(
        Math.floor(Math.random() * (range.max - range.min + 1)) + range.min
      );
    }
    return data;
  };

  const series = [
    { name: "14 PM", data: generateData(14, { min: 0, max: 90 }) },
    { name: "13 PM", data: generateData(14, { min: 0, max: 90 }) },
    { name: "12 PM", data: generateData(14, { min: 0, max: 90 }) },
    { name: "11 AM", data: generateData(14, { min: 0, max: 90 }) },
    { name: "10 AM", data: generateData(14, { min: 0, max: 90 }) },
    { name: "9 AM", data: generateData(14, { min: 0, max: 90 }) },
    { name: "8 AM", data: generateData(14, { min: 0, max: 90 }) },
  ];

  const options = {
    chart: {
      toolbar: { show: false },
    },
    dataLabels: { enabled: false },
    colors: ["#605DFF"],
    grid: {
      show: false,
      borderColor: "#ECEEF2",
    },
    xaxis: {
      axisTicks: { show: false, color: "#ECEEF2" },
      axisBorder: { show: false, color: "#ECEEF2" },
      labels: {
        show: true,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      labels: {
        show: true,
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
      },
      axisBorder: { show: false, color: "#ECEEF2" },
      axisTicks: { show: false, color: "#ECEEF2" },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
            <div>
              <h3 className="mb-0">Emergency Room Visits</h3>
              <p>ER based on patient visits</p>
            </div>

            <Form.Select
              className="month-select form-control w-135"
              aria-label="Select time range"
            >
              <option defaultValue="0">Last Week</option>
              <option defaultValue="1">Last 60 Days</option>
              <option defaultValue="2">Last 90 Days</option>
            </Form.Select>
          </div>

          <div style={{ margin: "-36px -21px -25px -18px" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="heatmap"
                height={240}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default EmergencyRoomVisits;
