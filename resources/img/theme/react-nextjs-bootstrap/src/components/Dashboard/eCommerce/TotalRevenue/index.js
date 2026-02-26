"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const TotalRevenue = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Fashion",
      data: [20, 40, 25, 60, 30, 50],
    },
    {
      name: "Others",
      data: [20, 20, 25, 15, 35, 25],
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
        columnWidth: "55%",
      },
    },
    colors: ["#605DFF", "#C2CDFF"],
    grid: {
      show: true,
      borderColor: "#ffffff",
    },
    stroke: {
      width: 2,
      show: true,
      colors: ["transparent"],
    },
    dataLabels: {
      enabled: false,
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
        show: false,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      show: false,
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
    legend: {
      show: false,
      fontSize: "12px",
      position: "bottom",
      horizontalAlign: "center",
      itemMargin: {
        horizontal: 8,
        vertical: 0,
      },
      labels: {
        colors: "#64748B",
      },
      markers: {
        shape: 'diamond',
        offsetX: -2,
        offsetY: -0.5,
      },
    },
    fill: {
      opacity: 1,
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4 stats-box">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between flex-wrap gap-2">
            <div>
              <div className="d-flex">
                <span>Total Revenue</span>
                <span className="count up">+10%</span>
              </div>
              <h3 className="fs-20 mt-1 mb-0">$165,458</h3>
            </div>
            <span className="fs-12">Last 30 days</span>
          </div>

          <div
            style={{
              maxWidth: "196px",
              marginLeft: "auto",
              marginRight: "auto",
              marginBottom: "-19px",
              marginTop: "-32px",
            }}
          >
            {Chart && (
              <Chart options={options} series={series} type="bar" height={112} />
            )}
          </div>

          <ul className="ps-0 mb-0 list-unstyled stats-list">
            <li className="d-flex justify-content-between align-items-center">
              <span className="title">Fashion</span>
              <span>75%</span>
            </li>
            <li className="d-flex justify-content-between align-items-center">
              <span className="title">Others</span>
              <span>25%</span>
            </li>
          </ul>
        </Card.Body>
      </Card>
    </>
  );
};

export default TotalRevenue;
