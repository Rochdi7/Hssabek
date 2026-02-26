"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const MissingNullValuesAreaChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Network",
      data: [
        {
          x: "Dec 23 2017",
          y: null,
        },
        {
          x: "Dec 24 2017",
          y: 44,
        },
        {
          x: "Dec 25 2017",
          y: 31,
        },
        {
          x: "Dec 26 2017",
          y: 38,
        },
        {
          x: "Dec 27 2017",
          y: null,
        },
        {
          x: "Dec 28 2017",
          y: 32,
        },
        {
          x: "Dec 29 2017",
          y: 55,
        },
        {
          x: "Dec 30 2017",
          y: 51,
        },
        {
          x: "Dec 31 2017",
          y: 67,
        },
        {
          x: "Jan 01 2018",
          y: 22,
        },
        {
          x: "Jan 02 2018",
          y: 34,
        },
        {
          x: "Jan 03 2018",
          y: null,
        },
        {
          x: "Jan 04 2018",
          y: null,
        },
        {
          x: "Jan 05 2018",
          y: 11,
        },
        {
          x: "Jan 06 2018",
          y: 4,
        },
        {
          x: "Jan 07 2018",
          y: 15,
        },
        {
          x: "Jan 08 2018",
          y: null,
        },
        {
          x: "Jan 09 2018",
          y: 9,
        },
        {
          x: "Jan 10 2018",
          y: 34,
        },
        {
          x: "Jan 11 2018",
          y: null,
        },
        {
          x: "Jan 12 2018",
          y: null,
        },
        {
          x: "Jan 13 2018",
          y: 13,
        },
        {
          x: "Jan 14 2018",
          y: null,
        },
      ],
    },
  ];

  const options = {
    chart: {
      animations: {
        enabled: false,
      },
      zoom: {
        enabled: false,
      },
    },
    dataLabels: {
      enabled: false,
    },
    colors: ["#605DFF"],
    stroke: {
      curve: "straight",
    },
    fill: {
      opacity: 0.8,
      type: "pattern",
      pattern: {
        style: "horizontalLines",
        width: 5,
        height: 5,
        strokeWidth: 3,
      },
    },
    markers: {
      shape: 'diamond',
      size: 5,
      hover: {
        size: 9,
      },
    },
    title: {
      text: "Network Monitoring",
      align: "left",
      offsetX: -9,
      style: {
        fontWeight: "500",
        fontSize: "14px",
        color: "#64748B",
      },
    },
    tooltip: {
      intersect: true,
      shared: false,
    },
    theme: {
      palette: "palette1",
    },
    xaxis: {
      type: "datetime",
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
      title: {
        text: "Bytes Received",
        style: {
          color: "#3A4252",
          fontSize: "14px",
          fontWeight: 500,
        },
      },
      labels: {
        show: true,
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
      show: true,
      borderColor: "#ECEEF2",
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Missing Null Values Area Chart</h3>
          </div>

          <div
            style={{
              marginBottom: "-15px",
            }}
          >
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="area"
                height={350}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default MissingNullValuesAreaChart;
