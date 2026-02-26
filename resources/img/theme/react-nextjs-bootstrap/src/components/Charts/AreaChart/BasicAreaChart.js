"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const seriesData = {
  monthDataSeries1: {
    prices: [
      8107.85, 8128.0, 8122.9, 8165.5, 8340.7, 8423.7, 8423.5, 8514.3, 8481.85,
      8487.7, 8506.9, 8626.2, 8668.95, 8602.3, 8607.55, 8512.9, 8496.25,
      8500.65, 8881.1, 9340.85,
    ],
    dates: [
      "13 Nov 2018",
      "14 Nov 2018",
      "15 Nov 2018",
      "16 Nov 2018",
      "17 Nov 2018",
      "20 Nov 2018",
      "21 Nov 2018",
      "22 Nov 2018",
      "23 Nov 2018",
      "24 Nov 2018",
      "27 Nov 2018",
      "28 Nov 2018",
      "29 Nov 2018",
      "30 Nov 2018",
      "01 Dec 2018",
      "04 Dec 2018",
      "05 Dec 2018",
      "06 Dec 2018",
      "07 Dec 2018",
      "08 Dec 2018",
    ],
  },
};

const BasicAreaChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const [series] = useState([
    {
      name: "STOCK ABC",
      data: seriesData.monthDataSeries1.prices,
    },
  ]);

  const options = {
    chart: {
      zoom: {
        enabled: false,
      },
      toolbar: {
        show: true,
      },
    },
    dataLabels: {
      enabled: false,
    },
    colors: ["#605DFF"],
    stroke: {
      curve: "straight",
    },
    title: {
      text: "Fundamental Analysis of Stocks",
      align: "left",
      offsetX: -9,
      style: {
        fontWeight: "500",
        fontSize: "14px",
        color: "#64748B",
      },
    },
    subtitle: {
      text: "Price Movements",
      align: "left",
      offsetX: -9,
      style: {
        fontWeight: "normal",
        fontSize: "13px",
        color: "#64748B",
      },
    },
    labels: seriesData.monthDataSeries1.dates,
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
    grid: {
      show: true,
      borderColor: "#ECEEF2",
    },
    yaxis: {
      opposite: true,
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
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Basic Area Chart</h3>
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

export default BasicAreaChart;
