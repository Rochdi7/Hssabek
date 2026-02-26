"use client";

import React, { useEffect, useState } from "react";
import { Card, Form } from "react-bootstrap";

const RealTimeSales = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Sales",
      data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    plotOptions: {
      bar: {
        borderRadius: 5,
        horizontal: false,
        columnWidth: "22px",
        borderRadiusApplication: "around",
        borderRadiusWhenStacked: "all",
        dataLabels: {
          position: "top", // top, center, bottom
        },
      },
    },
    dataLabels: {
      enabled: true,
      formatter: function (val) {
        return val + "%";
      },
      offsetY: -20,
      style: {
        fontSize: "10px",
        colors: ["#64748B"],
      },
    },
    xaxis: {
      show: false,
      categories: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
      labels: {
        show: false,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    colors: ["#3584FC"],
    yaxis: {
      tickAmount: 5,
      show: false,
      max: 11,
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
    grid: {
      show: false,
      borderColor: "#ECEEF2",
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 p-4 mb-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
          <h3 className="mb-0">Real-Time Sales</h3>

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
            marginTop: "-30px",
          }}
        >
          {Chart && (
            <Chart options={options} series={series} type="bar" height={240} />
          )}
        </div>

        <div className="d-flex justify-content-between border-top pt-4">
          <div>
            <span className="fs-12 d-block mb-1">Total Sales</span>
            <h3 className="fs-18 fw-medium mb-0">
              $150.7k {' '}
              <span className="text-success fs-12">
                <i className="ri-arrow-up-fill"></i>
                12%
              </span>
            </h3>
          </div>

          <div>
            <span className="fs-12 d-block mb-1">Avg. Sales Per Day</span>
            <h3 className="fs-18 fw-medium mb-0">
              $19.2k {' '}
              <span className="text-danger fs-12">
                <i className="ri-arrow-down-fill"></i>
                7%
              </span>
            </h3>
          </div>
        </div>
      </Card>
    </>
  );
};

export default RealTimeSales;
