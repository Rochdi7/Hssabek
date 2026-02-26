"use client";

import React, { useEffect, useState } from "react";
import { Card, Form } from "react-bootstrap";

const RecentEarnings = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Gross Earnings",
      data: [44, 60, 41, 67, 22, 43],
    },
    {
      name: "Tax Withheld",
      data: [13, 30, 20, 8, 13, 27],
    },
    {
      name: "Net Earnings",
      data: [11, 20, 15, 15, 21, 14],
    },
  ];

  const options = {
    chart: {
      stacked: true,
      toolbar: {
        show: false,
      },
      zoom: {
        enabled: true,
      },
    },
    plotOptions: {
      bar: {
        borderRadius: 5,
        horizontal: false,
        columnWidth: "28px",
        borderRadiusApplication: "end",
      },
    },
    dataLabels: {
      enabled: false,
    },
    colors: ["#605DFF", "#9CAAFF", "#DDE4FF"],
    xaxis: {
      categories: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri"],
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
      axisBorder: {
        show: true,
        color: "#D5D9E2",
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
      max: 125,
      min: 0,
      labels: {
        formatter: (val) => {
          return "$" + val + "K";
        },
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
      },
      axisBorder: {
        show: true,
        color: "#D5D9E2",
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
        size: 7,
        offsetX: -2,
        offsetY: -0.5,
        shape: "diamond",
      },
    },
    fill: {
      opacity: 1,
    },
    grid: {
      show: true,
      strokeDashArray: 10,
      borderColor: "#ECEEF2",
    },
  };

  return (
    <>
      <Card className="bg-white border rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
            <h3 className="mb-0">Recent Earnings</h3>
            <Form.Select
              className="month-select form-control p-0 h-auto border-0 w-95"
              aria-label="Default select example"
            >
              <option defaultValue="0">This Month</option>
              <option defaultValue="1">Last Month</option>
              <option defaultValue="2">Last Year</option>
            </Form.Select>
          </div>

          <div 
            style={{ 
              marginTop: '-10px',
              marginBottom: '-25px',
              marginLeft: '-15px',
              marginRight: '-5px',
            }}
          >
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="bar"
                height={422}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default RecentEarnings;
