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
      name: "Completed",
      data: [80, 55, 60, 55, 80],
    },
    {
      name: "Pending",
      data: [50, 85, 60, 70, 60],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },

    colors: ["#1F64F1", "#C2CDFF"],
    plotOptions: {
      bar: {
        columnWidth: "85%",
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: 2,
      show: true,
      colors: ["transparent"],
    },
    grid: {
      show: true,
      borderColor: "#ffffff",
    },
    xaxis: {
      categories: ["Jan", "Feb", "Mar", "Apr", "May"],
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
    tooltip: {
      y: {
        formatter: function (val) {
          return val + "%";
        },
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
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4 stats-box">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between flex-wrap gap-2">
            <div>
              <div className="d-flex">
                <span>Total Orders</span>
                <span className="count">-7.6%</span>
              </div>
              <h3 className="fs-20 mt-1 mb-0">$72,458</h3>
            </div>
            <span className="fs-12">Last 7 days</span>
          </div>
 
          <div 
            style={{ 
              maxWidth: '153px',
              marginLeft: 'auto',
              marginRight: 'auto',
              marginBottom: '-14px',  
              marginTop: '-24px' 
            }}
          >
            {Chart && (
              <Chart options={options} series={series} type="bar" height={99} />
            )}
          </div>

          <ul className="ps-0 mb-0 list-unstyled stats-list">
            <li className="d-flex justify-content-between align-items-center">
              <span className="title">Completed</span>
              <span>62%</span>
            </li>

            <li className="d-flex justify-content-between align-items-center">
              <span className="title">Pending payment</span>
              <span>38%</span>
            </li>
          </ul>
        </Card.Body>
      </Card>
    </>
  );
};

export default TotalOrders;
