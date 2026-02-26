"use client";

import React, { useEffect, useState } from "react";
import { Card, Form } from "react-bootstrap";

const SalesOverview = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Sales",
      data: [80, 50, 30, 40, 100, 20],
    },
    {
      name: "Sales",
      data: [20, 30, 40, 80, 20, 80],
    },
    {
      name: "Sales",
      data: [30, 70, 80, 15, 45, 10],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    dataLabels: {
      enabled: false,
    },
    xaxis: {
      categories: ["2019", "2020", "2021", "2022", "2023", "2024"],
      labels: {
        show: true,
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
      },
    },
    markers: {
      colors: "transparent",
      strokeWidth: 0,
    },
    colors: ["#605DFF", "#37D80A", "#FD5812"],
    yaxis: {
      show: false,
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return val + "%";
        },
      },
    },
    legend: {
      show: false,
      position: "top",
      fontSize: "12px",
      horizontalAlign: "center",
      itemMargin: {
        horizontal: 8,
        vertical: 0,
      },
      labels: {
        colors: "#64748B",
      },
      markers: {
        size: 7,
        offsetX: -2,
        offsetY: -0.5,
        shape: "diamond",
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 p-4 mb-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
          <h3 className="mb-0">Sales Overview</h3>

          <Form.Select
            className="month-select form-control p-0 h-auto border-0 w-90"
            aria-label="Default select example"
          >
            <option defaultValue="0">Today</option>
            <option defaultValue="1">Last Week</option>
            <option defaultValue="2">Last Month</option>
          </Form.Select>
        </div>

        <div
          style={{
            margin: "-32px 0 -30px 0",
          }}
        >
          {Chart && (
            <Chart
              options={options}
              series={series}
              type="radar"
              height={340}
            />
          )}
        </div>
      </Card>
    </>
  );
};

export default SalesOverview;
