"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const PendingOrders = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Orders",
      data: [15, 11, 9, 10, 7, 7, 3]
    }
  ];

  const options = {
    chart: {
      zoom: {
        enabled: false,
      },
      toolbar: {
        show: false,
      },
    },
    colors: [
      "#868DFF"
    ],
    dataLabels: {
      enabled: false
    },
    grid: {
      show: false,
      borderColor: "#868DFF"
    },
    stroke: {
      curve: "straight",
      width: 2
    },
    xaxis: {
      categories: [
        "Mon",
        "Tue",
        "Wed",
        "Thu",
        "Fri",
        "Sat",
        "Sun"
      ],
      axisTicks: {
        show: false,
        color: '#ECEEF2'
      },
      axisBorder: {
        show: false,
        color: '#ECEEF2'
      },
      labels: {
        show: false,
        style: {
          colors: "#8695AA",
          fontSize: "12px"
        }
      }
    },
    yaxis: {
      // tickAmount: 6,
      show: false,
      // max: 150,
      // min: 0,
      labels: {
        // formatter: (val:any) => {
        //     return '$' + val + 'k'
        // },
        style: {
          colors: "#64748B",
          fontSize: "12px"
        }
      },
      axisBorder: {
        show: false,
        color: '#ECEEF2'
      },
      axisTicks: {
        show: false,
        color: '#ECEEF2'
      }
    },
    legend: {
      show: false,
      position: 'top',
      fontSize: '12px',
      horizontalAlign: 'left',
      itemMargin: {
        horizontal: 8,
        vertical: 0
      },
      labels: {
        colors: '#64748B'
      },
      markers: {
        size: 7,
        offsetX: -2,
        offsetY: -.5,
        shape: 'diamond'
      }
    }
  };

  return (
    <>
      <Card className="border-0 rounded-3 bg-white revenue-card mb-4">
        <div className="d-flex align-items-center position-relative">
          <div className="flex-shrink-0">
            <span className="fs-14">Pending Orders</span>
            <h2 className="text-secondary-50">113</h2>
            <span
              className="d-inline-block rounded-pill fs-12 fw-medium mb-1"
              style={{
                padding: "1px 7.3px",
                backgroundColor: "#FFE1DD",
                color: '#ff4023',
              }}
            >
              -3.2%
            </span>
            <p className="fs-12">vs previous 30 days</p>
          </div>
          <div className="flex-grow-1 ms-3">
            <div
              style={{
                margin: "-30px -9px 0 0",
                maxWidth: "130px",
                top: "10px",
              }}
              className="ms-auto position-relative"
            >
              {Chart && (
                <Chart
                  options={options}
                  series={series}
                  type="area"
                  height={125}
                />
              )}
            </div>
          </div>
        </div>
      </Card>
    </>
  );
};

export default PendingOrders;
