"use client";

import React, { useEffect, useState } from "react";
import { Card, Form } from "react-bootstrap";

const ProjectsProgress = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Completed",
      data: [70, 23, 45, 30, 62, 70],
    },
    {
      name: "In Progress",
      data: [15, 40, 37, 38, 80, 45],
    },
    {
      name: "Not Start Yet",
      data: [50, 11, 60, 15, 31, 30],
    },
    {
      name: "Cancelled",
      data: [30, 60, 25, 22, 50, 15],
    },
  ];

  const options = {
    chart: {
      zoom: {
        enabled: false,
      },
      toolbar: {
        show: true,
      },
    },

    dataLabels: {
      enabled: false,
    },
    colors: ["#605DFF", "#FE7A36", "#AD63F6", "#D71C00"],
    stroke: {
      curve: "smooth",
      width: 2,
    },
    grid: {
      show: true,
      borderColor: "#ECEEF2",
    },
    markers: {
      size: 4,
      strokeWidth: 0,
      shape: ["circle", "square", "circle", "square"],
      hover: {
        size: 5,
      },
    },
    xaxis: {
      categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
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
      tickAmount: 5,
      max: 100,
      min: 0,
      labels: {
        formatter: (val) => {
          return val + "%";
        },
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
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4 z-0">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
            <h3 className="mb-0">Projects Progress</h3>

            <Form.Select
              className="month-select form-control p-0 h-auto border-0"
              aria-label="Default select example"
            >
              <option defaultValue="0">Select</option>
              <option defaultValue="1">This Day</option>
              <option defaultValue="2">This Weekly</option>
              <option defaultValue="3">This Monthly</option>
              <option defaultValue="4">This Yearly</option>
            </Form.Select>
          </div>

          <div
            style={{
              marginLeft: "-13px",
              marginTop: "-8px",
              marginBottom: "-20px",
            }}
          >
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="line"
                height={358}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default ProjectsProgress;
