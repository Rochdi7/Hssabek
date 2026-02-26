"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const AnnualProfit = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Revenue Growth",
      data: [3, 12, 8, 10, 15, 10, 7],
    },
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
    colors: ["#C52B09"],
    dataLabels: {
      enabled: false,
    },
    grid: {
      show: false,
      borderColor: "#ECEEF2",
    },
    stroke: {
      curve: "monotoneCubic",
      width: 1,
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
      show: false,
      labels: {
        formatter: (val) => {
          return "$" + val + "k";
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
      show: false,
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
      <Card className="bg-white border-0 rounded-3 mb-4 stats-box position-relative">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between">
            <div className="mb-35">
              <span>Annual Profit</span>
              <h3 className="fs-20 mt-1 mb-0">$879.6k</h3>
            </div>

            <div className="chart-position">
              {Chart && (
                <Chart
                  options={options}
                  series={series}
                  type="area"
                  height={95}
                />
              )}
            </div>
          </div>

          <div className="d-flex justify-content-between flex-wrap gap-2 align-items-center">
            <span className="count up fw-medium ms-0">+30%</span>
            <span className="fs-12">Last 12 months</span>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default AnnualProfit;
