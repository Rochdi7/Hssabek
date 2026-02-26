"use client";

import React, { useEffect, useState } from "react";
import { Card, Form } from "react-bootstrap";

const SalesReport = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Online",
      data: [45, 23, 62, 60, 110, 100, 135],
    },
    {
      name: "Offline",
      data: [20, 58, 24, 50, 40, 70, 97],
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
    colors: ["#605DFF", "#FE7A36"],
    stroke: {
      curve: "straight",
      width: 2,
    },
    grid: {
      show: true,
      borderColor: "#F6F7F9",
    },
    markers: {
      size: 4,
      strokeWidth: 0,
      shape: 'diamond',
      hover: {
        size: 5,
      },
    },
    xaxis: {
      categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
      axisTicks: {
        show: false,
        color: "#B1BBC8",
      },
      axisBorder: {
        show: false,
        color: "#B1BBC8",
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
        formatter: (val) => {
          return "$" + val + "k";
        },
        style: {
          colors: "#64748B",
          fontSize: "12px",
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
      <Card className="bg-white border-0 rounded-3 mb-4 z-0">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
            <h3 className="mb-0">Sales Report</h3>

            <Form.Select
              className="month-select form-control p-0 h-auto border-0"
              aria-label="Default select example"
            >
              <option defaultValue="0">Select</option>
              <option defaultValue="1">Today</option>
              <option defaultValue="2">Last Weekly</option>
              <option defaultValue="3">Last Monthly</option>
              <option defaultValue="4">Last Yearly</option>
            </Form.Select>
          </div>

          <div
            style={{
              marginLeft: "-10px",
              marginBottom: "-15px",
            }}
          >
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="line"
                height={374}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default SalesReport;
