"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const SteplineLineChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Stepline Series",
      data: [34, 44, 54, 21, 12, 43, 33, 23, 66, 66, 58],
    },
  ];

  const options = {
    stroke: {
      curve: "stepline",
    },
    colors: ["#605DFF"],
    dataLabels: {
      enabled: false,
    },
    title: {
      text: "Stepline Chart",
      align: "left",
      offsetX: -9,
      style: {
        fontWeight: "500",
        fontSize: "14px",
        color: "#64748B",
      },
    },
    markers: {
      hover: {
        sizeOffset: 4,
      },
    },
    xaxis: {
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
            <h3 className="mb-0">Stepline Line Chart</h3>
          </div>

          <div
            style={{
              marginBottom: "-20px",
            }}
          >
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="line"
                height={355}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default SteplineLineChart;
