"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const TotalOrders = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Total Orders",
      data: [44, 55, 57, 56, 61, 58, 63],
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
        columnWidth: "50%",
        borderRadius: 2,
      },
    },
    colors: ["#0dcaf0"],
    dataLabels: {
      enabled: false,
    },
    grid: {
      show: false,
      borderColor: "#ECEEF2",
    },
    stroke: {
      width: 2,
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
        show: false,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      // tickAmount: 6,
      show: false,
      // max: 150,
      // min: 0,
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
          return "$" + val;
        },
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4 stats-box position-relative">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between">
            <div className="mb-35">
              <span>Total Orders</span>
              <h3 className="fs-20 mt-1 mb-0">$72,458</h3>
            </div>

            <div className="chart-position">
              {Chart && (
                <Chart
                  options={options}
                  series={series}
                  type="bar"
                  height={110}
                />
              )}
            </div>
          </div>

          <div className="d-flex justify-content-between flex-wrap gap-2 align-items-center">
            <span className="count up fw-medium ms-0">+25%</span>
            <span className="fs-12">Last 90 days</span>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default TotalOrders;
