"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const RotatedLabelsColumnChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Servings",
      data: [44, 55, 41, 67, 22, 43, 21, 33, 45, 31, 87, 65, 35],
    },
  ];

  const options = {
    annotations: {
      points: [
        {
          x: "Bananas",
          seriesIndex: 0,
          label: {
            borderColor: "#605DFF",
            offsetY: 0,
            style: {
              fontSize: "14px",
              color: "#ffffff",
              background: "#605DFF",
            },
            text: "Bananas are good",
          },
        },
      ],
    },
    chart: {
      toolbar: {
        show: true,
      },
    },
    plotOptions: {
      bar: {
        columnWidth: "50%",
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: 2,
    },
    grid: {
      show: true,
      borderColor: "#ECEEF2",
    },
    xaxis: {
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
      labels: {
        rotate: -45,
        show: true,
        style: {
          colors: "#64748B",
          fontSize: "13px",
        },
      },
      categories: [
        "Apples",
        "Oranges",
        "Strawberries",
        "Pineapples",
        "Mangoes",
        "Bananas",
        "Blackberries",
        "Pears",
        "Watermelons",
        "Cherries",
        "Pomegranates",
        "Tangerines",
        "Papayas",
      ],
      tickPlacement: "on",
    },
    yaxis: {
      title: {
        text: "Servings",
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
    fill: {
      type: "gradient",
      gradient: {
        shade: "light",
        type: "horizontal",
        shadeIntensity: 0.25,
        gradientToColors: undefined,
        inverseColors: true,
        opacityFrom: 0.85,
        opacityTo: 0.85,
        // stops: [50, 0, 100]
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Rotated Labels Column Chart</h3>
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
                type="bar"
                height={350}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default RotatedLabelsColumnChart;
