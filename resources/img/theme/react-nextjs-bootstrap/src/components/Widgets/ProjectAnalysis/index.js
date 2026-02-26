"use client";

import React, { useEffect, useState } from "react";
import { Card, Form } from "react-bootstrap";

const ProjectAnalysis = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Budgets",
      data: [40, 60, 55, 30, 60, 130, 63],
    },
    {
      name: "Expenses",
      data: [15, 65, 100, 40, 90, 90, 91],
    },
    {
      name: "Revenue",
      data: [55, 70, 30, 50, 110, 60, 52],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: true,
      },
    },

    colors: ["#605DFF", "#AD63F6", "#3584FC"],
    plotOptions: {
      bar: {
        columnWidth: "60%",
      },
    },
    grid: {
      show: true,
      borderColor: "#ECEEF2",
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: 4,
      show: true,
      colors: ["transparent"],
    },
    xaxis: {
      categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
      labels: {
        show: true,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      tickAmount: 6,
      max: 150,
      min: 0,
      labels: {
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "$" + val + "k";
        },
      },
    },
    legend: {
      show: true,
      position: "top",
      fontSize: "12px",
      horizontalAlign: "left",
      itemMargin: {
        horizontal: 8,
        vertical: 0,
      },
      labels: {
        colors: "#64748B",
      },
      markers: {
        shape: 'diamond',
        width: 9,
        height: 9,
        offsetX: -2,
        offsetY: -0.5,
        radius: 2,
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
            <h3 className="mb-0">Project Analysis</h3>

            <Form.Select
              className="month-select form-control p-0 h-auto border-0"
              aria-label="Default select example"
            >
              <option defaultValue="0">Select</option>
              <option defaultValue="1">Last 7 Days</option> 
              <option defaultValue="2">This Monthly</option>
              <option defaultValue="3">This Yearly</option>
            </Form.Select>
          </div>

          <div
            style={{
              marginLeft: "-12px",
              marginTop: "-5px",
              marginBottom: "-20px",
            }}
          >
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="bar"
                height={366}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default ProjectAnalysis;
