"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const StrockedCircularGaugeRadialBarChart = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [67];

  const options = {
    chart: {
      offsetY: -10,
    },
    plotOptions: {
      radialBar: {
        startAngle: -135,
        endAngle: 135,
        dataLabels: {
          name: {
            fontSize: "16px",
            color: undefined,
            offsetY: 120,
          },
          value: {
            offsetY: 76,
            fontSize: "22px",
            color: undefined,
            formatter: function (val) {
              return val + "%";
            },
          },
        },
      },
    },
    fill: {
      type: "gradient",
      gradient: {
        shade: "dark",
        shadeIntensity: 0.15,
        inverseColors: false,
        opacityFrom: 1,
        opacityTo: 1,
        // stops: [0, 50, 65, 91]
      },
    },
    stroke: {
      dashArray: 4,
    },
    labels: ["Median Ratio"],
    colors: ["#605DFF"],
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Strocked Circular Gauge RadialBar Chart</h3>
          </div>

          {Chart && (
            <Chart
              options={options}
              series={series}
              type="radialBar"
              height={365}
            />
          )}
        </Card.Body>
      </Card>
    </>
  );
};

export default StrockedCircularGaugeRadialBarChart;
